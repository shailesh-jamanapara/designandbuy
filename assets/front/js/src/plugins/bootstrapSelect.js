// Object of plugins to add to Globals.PLUGINS
Globals.PLUGINS.themePluginBootstrapSelect = function(context) {
  // ----------------------------------------------------------------
  // Plugin: Bootstrap Select
  // @see: https://github.com/snapappointments/bootstrap-select
  // ----------------------------------------------------------------          
  var $selects = context.find('[data-toggle="select"], [data-toggle="selects"] select');
  var themePluginBootstrapSelectInit = function() {
    if ($selects.length > 0) {
      $selects.each(function() {
        var $select = $(this);
        var styles = [];
        var defaultSettings = {
          "width":"100%",
          "style":null,
          "classes":null,
        };
        var customSettings = $select.data('settings') || {};
        var settings = $.extend({}, defaultSettings, customSettings); // @see: https://silviomoreto.github.io/bootstrap-select/options/
        var style = $select.data('style') || null;
        
        if (style) {
          styles.push(style);
        }
        if ($select.hasClass('form-control-lg')) {
          styles.push('btn-lg');
        }
        else if ($select.hasClass('form-control-sm')) {
          styles.push('btn-sm');
        }
        if ($select.hasClass('form-control-rounded')) {
          styles.push('btn-rounded');
        }
        if (settings.classes !== null) {
          if (typeof settings.classes == 'object') {
            $.each(settings.classes, function(key, value) {
              styles.push(value);
            })
          }
          else if (typeof settings.classes == 'string') {
            styles.push(settings.classes);
          }
        }
        
        // Default
        if (styles.length == 0) {
          styles.push('btn-light');
        }
        
        if (styles) {
          settings.style = styles.join(' ');
        }
        
        $select.selectpicker(settings);
      });
    }
  };
  
  if ($selects.length > 0) {
    $document.themeLoadPlugin(
      ["https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"],
      ["https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css", "plugin-css/plugin-bootstrap-select.min.css"],
      themePluginBootstrapSelectInit
    );
  }
};


