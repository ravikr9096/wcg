/****************************
NOTIFICATIONS
****************************/

(function() {
    tinymce.create('tinymce.plugins.notifications', {
        init : function(ed, url) {
            ed.addButton('notifications', {
                title : 'Notifications',
                image : url+'/img/notification.png',
                onclick : function() {
                     ed.selection.setContent('[alert style="info"]' + ed.selection.getContent() + '[/alert]'); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('notifications', tinymce.plugins.notifications);
})();


/****************************
BLOCKQUOTES
****************************/

(function() {
    tinymce.create('tinymce.plugins.quotes', {
        init : function(ed, url) {
            ed.addButton('quotes', {
                title : 'Blockquote',
                image : url+'/img/quote.png',
                onclick : function() {
                     ed.selection.setContent('[blockquote style="style2"]' + ed.selection.getContent() + '[/blockquote]'); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('quotes', tinymce.plugins.quotes);
})();


/****************************
BUTTONS
****************************/

(function() {
    tinymce.create('tinymce.plugins.buttons', {
        init : function(ed, url) {
            ed.addButton('buttons', {
                title : 'Buttons',
                image : url+'/img/buttons.png',
                onclick : function() {
                     ed.selection.setContent('[a href="http://themeforest.net/user/EngineThemes" style="small" target="_blank"]' + ed.selection.getContent() + '[/a]'); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('buttons', tinymce.plugins.buttons);
})();


/****************************
UNORDERED LIST
****************************/

(function() {
    tinymce.create('tinymce.plugins.unorderedlist', {
        init : function(ed, url) {
            ed.addButton('unorderedlist', {
                title : 'Unordered List',
                image : url+'/img/ulist.png',
                onclick : function() {
                     ed.selection.setContent('[ul style="balloon"][li]' + ed.selection.getContent() + '[/li][/ul]'); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('unorderedlist', tinymce.plugins.unorderedlist);
})();


/****************************
DROPCAPS
****************************/

(function() {
    tinymce.create('tinymce.plugins.dropcap', {
        init : function(ed, url) {
            ed.addButton('dropcap', {
                title : 'Dropcaps',
                image : url+'/img/dropcap.png',
                onclick : function() {
                     ed.selection.setContent('[dropcap style="dropcap"]' + ed.selection.getContent() + '[/dropcap]'); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('dropcap', tinymce.plugins.dropcap);
})();


/****************************
COLUMNS
****************************/

(function() {
    tinymce.create('tinymce.plugins.columns', {
        init : function(ed, url) {
            ed.addButton('columns', {
                title : 'Columns',
                image : url+'/img/columns.png',
                onclick : function() {
                     ed.selection.setContent('[columns style="one-half"]' + ed.selection.getContent() + '[/columns]'); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('columns', tinymce.plugins.columns);
})();


/****************************
IMAGE
****************************/

(function() {
    tinymce.create('tinymce.plugins.image', {
        init : function(ed, url) {
            ed.addButton('image', {
                title : 'Image',
                image : url+'/img/image.png',
                onclick : function() {
                     ed.selection.setContent('[image src="http://wp.themecss.com/Source/wp-content/uploads/2012/12/bg.jpg" width="100%" height="auto" title="" style="resize"]' + ed.selection.getContent()); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('image', tinymce.plugins.image);
})();


/****************************
TABS
****************************/

(function() {
    tinymce.create('tinymce.plugins.jtabgroups', {
        init : function(ed, url) {
            ed.addButton('jtabgroups', {
                title : 'Tabs',
                image : url+'/img/tab.png',
                onclick : function() {
                     ed.selection.setContent('[tabgroup][tab title=""]' + ed.selection.getContent() + '[/tab][/tabgroup]' ); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('jtabgroups', tinymce.plugins.jtabgroups);
})();


/****************************
TOGGLE
****************************/

(function() {
    tinymce.create('tinymce.plugins.toggle', {
        init : function(ed, url) {
            ed.addButton('toggle', {
                title : 'Toggle',
                image : url+'/img/toggle.png',
                onclick : function() {
                     ed.selection.setContent('[toggle title=""]' + ed.selection.getContent() + '[/toggle]' ); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('toggle', tinymce.plugins.toggle);
})();


/****************************
VIDEO
****************************/

(function() {
    tinymce.create('tinymce.plugins.video', {
        init : function(ed, url) {
            ed.addButton('video', {
                title : 'Video',
                image : url+'/img/video.png',
                onclick : function() {
                     ed.selection.setContent('[video site="vimeo" id="21942776" w="100%" h="400"]' + ed.selection.getContent() ); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('video', tinymce.plugins.video);
})();


/****************************
GOOGLE MAP
****************************/

(function() {
    tinymce.create('tinymce.plugins.gmap', {
        init : function(ed, url) {
            ed.addButton('gmap', {
                title : 'Google Map',
                image : url+'/img/gmap.png',
                onclick : function() {
                     ed.selection.setContent('[googlemap src="https://maps.google.com/?ll=39.061849,-99.536133&spn=14.980005,33.815918&t=m&z=6" width="100%" height="400"]' + ed.selection.getContent() ); 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('gmap', tinymce.plugins.gmap);
})();