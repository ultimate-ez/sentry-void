(function($, document, window){

    var path = $('#templateDirectory').val();

    tinymce.create(
        'tinymce.plugins.MyButtons',
        {
            init: function(editor, url)
            {
                editor.addButton( 'marker_button',{
                  title: 'マーカーを引く',
                  type: 'menubutton',
                  image : url.replace('/js','') + '/img/icon-marker.png',
                  menu: [
                    {
                      text: "黄色・太マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker yellow thick">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "黄色・細マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker yellow thin">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "赤・太マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker pink thick">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "赤・細マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker pink thin">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "青・太マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker blue thick">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "青・細マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker blue thin">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "緑・太マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker green thick">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "緑・細マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker green thin">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "オレンジ・太マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker orange thick">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "オレンジ・細マーカー",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<span class="marker orange thin">' + selected_text + '</span>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                  ]
                });
                editor.addButton( 'notification_button',{
                  title: 'ボックスで囲む',
                  type: 'menubutton',
                  image : url.replace('/js','') + '/img/icon-notification.png',
                  menu: [
                    {
                      text: "ボックス（notication)",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="notification">' + selected_text + '</div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "ボックス（notication):青",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="notification is-info">' + selected_text + '</div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "ボックス（notication):緑",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="notification is-success">' + selected_text + '</div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "ボックス（notication):黄色",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="notification is-warning">' + selected_text + '</div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "ボックス（notication):赤",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="notification is-danger">' + selected_text + '</div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "ボックス（notication):ターコイズ",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="notification is-primary">' + selected_text + '</div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                  ]
                });
                editor.addButton( 'insertHtml_button',{
                  title: 'HTMLを挿入',
                  icon: 'code',
                  cmd: 'insertHtml_cmd'
                });
                editor.addCommand( 'insertHtml_cmd', function(){
                  var raw_html = window.prompt( 'HTMLを挿入する');
                  editor.execCommand( 'mceInsertContent', 0, raw_html);
                });
                editor.addButton( 'balloon_left', {
                  title: '左から吹き出し',
                  type: 'menubutton',
                  image : url.replace('/js','') + '/img/icon-bubble-l.png',
                  menu: [
                    {
                      text: "吹き出し:スタイル①",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="balloon left"><div class="balloon-image"> i <div class="balloon-image-description">名前</div></div><div class="balloon-text">' + selected_text + '</div></div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "吹き出し:スタイル②",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="balloon left"><div class="balloon-image circle"> i <div class="balloon-image-description">名前</div></div><div class="balloon-text">' + selected_text + '</div></div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                  ]
                });
                editor.addButton( 'balloon_right', {
                  title: '右から吹き出し',
                  type: 'menubutton',
                  image : url.replace('/js','') + '/img/icon-bubble-r.png',
                  menu: [
                    {
                      text: "吹き出し:パターン①",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="balloon right"><div class="balloon-text">' + selected_text + '</div><div class="balloon-image"> i <div class="balloon-image-description">名前</div></div></div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                    {
                      text: "吹き出し:パターン②",
                      onclick: function() {
                        selected_text = editor.selection.getContent();
                        return_text = '<div class="balloon right"><div class="balloon-text">' + selected_text + '</div><div class="balloon-image circle"> i <div class="balloon-image-description">名前</div></div></div>';
                        editor.execCommand( 'mceInsertContent', 0, return_text );
                      }
                    },
                  ]
                });
            },
            createControl: function(n,cm)
            {
                return null;
            }
        }
    );
    tinymce.PluginManager.add(
        'custom_button_script',
        tinymce.plugins.MyButtons
    );
})(jQuery, document, window);
