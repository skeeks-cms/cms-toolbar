/*!
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 19.03.2015
 */

(function(sx, $, _)
{
    sx.createNamespace('classes.toolbar', sx);

    sx.classes.SkeeksToolbar = sx.classes.Component.extend({

        _init: function()
        {
            var self = this;

            this.bind('update', function()
            {
                self.save();
            });
        },

        getWrapper: function() 
        {
            return $('#' + this.get('container-id'));
        },
        
        _onDomReady: function()
        {
            var self = this;

            _.defer(function()
            {
                self.update();
            });
            
            
            $(".sx-cms-toolbar__go_to_admin a").on('click', function() {
                $('.sx-cms-toolbar').css('transition', '0.7s').css('top', '-50px'); 
                $('html').css('margin-top', '50%');
                $('html').css('opacity', '0.5');
                
                var link = $(this).attr('href');
                _.delay(function() {
                    $('html').css('background', '#000000cf');
                    $('body').css('background', '#000000cf');
                    location.href = link;
                }, 200);
                return false;
            });

        },

        toggle: function()
        {
            if (this.get('isOpen') === true) {
                this.close();
            } else {
                this.open();
            }

            return this;
        },

        open: function()
        {
            this.getWrapper().addClass('sx-cms-toolbar_active');
            this.update();

            this.set('isOpen', true);

            this.trigger('update', this);
        },

        close: function()
        {
            this.getWrapper().removeClass('sx-cms-toolbar_active');
            this.update();

            this.set('isOpen', false);

            this.trigger('update', this);
        },
        
        update: function()
        {
            var self = this;

            $('html').css('transition', 'all 300ms');

            _.delay(function() {
                if (self.get('isOpen', true) === true)
                {
                    $('html').css('margin-top', self.getWrapper().height());
                } else
                {
                    $('html').css('margin-top', 0);
                }
            }, 350);

        },

        save: function()
        {
            var ajax = sx.ajax.preparePostQuery(this.get('backend-url-triggerIsOpen'), this.toArray());
            new sx.classes.AjaxHandlerStandartRespose(ajax);
            ajax.execute();
        },

        triggerEditWidgets: function()
        {
            var ajax = sx.ajax.preparePostQuery(this.get('backend-url-triggerEditWidgets'));

            new sx.classes.AjaxHandlerNotify(ajax);
            new sx.classes.AjaxHandlerBlocker(ajax, {
                'wrapper' : 'body'
            })

            ajax.bind('complete', function(e)
            {
                window.location.reload();
            });

            ajax.execute();
        },

        triggerEditViewFiles: function()
        {
            var ajax = sx.ajax.preparePostQuery(this.get('backend-url-triggerEditViewFiles'));

            new sx.classes.AjaxHandlerNotify(ajax);
            new sx.classes.AjaxHandlerBlocker(ajax, {
                'wrapper' : 'body'
            })

            ajax.bind('complete', function(e)
            {
                window.location.reload();
            });

            ajax.execute();
        },

        /**
         * Настройки для инфоблоков
         * @returns {*}
         */
        getInfoblockSettings: function()
        {
            return this.get('infoblockSettings', {});
        }
    });

})(sx, sx.$, sx._);