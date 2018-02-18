(function($, document, window){

    var path = $('#templateDirectory').val();

    tinymce.create(
        'tinymce.plugins.MyButtons',
        {
            init: function(editor, url)
            {
                editor.addButton(
                    'marker_button',{
                        title: 'マーカーを引く',
                        type: 'menubutton',
                        // icon: 'sentry-icon-marker-yellow-thin',
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
                    },
                  );
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