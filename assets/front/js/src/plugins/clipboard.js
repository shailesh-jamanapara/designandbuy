var clipboardSelectors = '[data-clipboard-target], [data-clipboard-text]';

// Object of plugins to add to Globals.PREINITPLUGINS
Globals.PREINITPLUGINS.themePluginClipboard = function(context) {
  // Get premanipulated HTML
  $(clipboardSelectors).each(function() {
    var $this = $(this);
    if ($this.data('clipboard-target-html')) {
      var target = $this.data('clipboard-target');
      var $target = $(target);
      $target.data('clipboard-html-clone', $target.clone().prop('outerHTML'));
    }
  });  
};

// Object of plugins to add to Globals.PLUGINS
Globals.PLUGINS.themePluginClipboard = function(context) {
  // ----------------------------------------------------------------
  // Plugin: Clipboard.js
  // @see: https://clipboardjs.com/
  // ----------------------------------------------------------------
  
  var $clipboards = context.find(clipboardSelectors);
  var formatFactory = function(html) {
    var parse = function(html, tab) {
        if (!tab) {
          tab = 0;
        }
        var html = $.parseHTML(html);
        var formatHtml = new String();   

        function setTabs () {
            var tabs = new String();

            for (i=0; i < tab; i++){
              tabs += '\t';
            }
            return tabs;    
        };


        $.each( html, function( i, el ) {
            if (el.nodeName == '#text') {
                if (($(el).text().trim()).length) {
                    formatHtml += setTabs() + $(el).text().trim() + '\n';
                }    
            } else {
                var innerHTML = $(el).html().trim();
                $(el).html(innerHTML.replace('\n', '').replace(/ +(?= )/g, ''));
                

                if ($(el).children().length) {
                    $(el).html('\n' + parse(innerHTML, (tab + 1)) + setTabs());
                    var outerHTML = $(el).prop('outerHTML').trim();
                    formatHtml += setTabs() + outerHTML + '\n'; 

                } else {
                    var outerHTML = $(el).prop('outerHTML').trim();
                    formatHtml += setTabs() + outerHTML + '\n';
                }      
            }
        });

        return formatHtml;
    };   
    
    return parse(html.replace(/(\r\n|\n|\r)/gm," ").replace(/ +(?= )/g,''));
  };
  
  var themePluginClipboardInit = function() {
    if ($clipboards.length > 0) {      
      var clipboard = new Clipboard(clipboardSelectors, {
        text: function(trigger) {
          if ($(trigger).data('clipboard-target-html')) {
            var target = $(trigger).data('clipboard-target');
            var $target = $(target);
            var htmlClone = $target.data('clipboard-html-clone') || null;
            var html = htmlClone || $target.clone().html();
            return formatFactory(html);
          }
        }
      });
      clipboard.on('success', function(e) {
        var $trigger = $(e.trigger) || null;
        var hasTooltip = $trigger.data('toggle') == 'tooltip' || false;
        if (hasTooltip !== false) {
          var originalTitle = $trigger.data('original-title');
          $trigger.attr("title", "Copied!").tooltip("_fixTitle").tooltip("show").attr("title", originalTitle).tooltip("_fixTitle")
        }
        e.clearSelection();
      });
    }
  };
  
  if ($clipboards.length > 0) {
    $document.themeLoadPlugin(
      ["https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"],
      [],
      themePluginClipboardInit
    );
  }
};


