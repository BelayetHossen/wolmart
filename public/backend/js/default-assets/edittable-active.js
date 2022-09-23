(function ($) {
    "use strict";

    var editor = new SimpleTableCellEditor("basicTableId");
    editor.SetEditableClass("editMe");

    $('#basicTableId').on("cell:edited", function (event) {
        console.log(`'${event.oldValue}' changed to '${event.newValue}'`);
    });

})(jQuery);