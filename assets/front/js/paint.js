var configurations = {
    canvasWidth: 500,
    canvasHeight: 500,
    color: "#48c"
};

var tools = {
    selection: function() {
        var v = $("#tools-area .active").val();
        return tools[v];
    },
    move: (function() {
        var imageData = null;
        return {
            onDrag: function(from, to) {
                var w = canvases.user.canvas.width;
                var h = canvases.user.canvas.height;
                if (imageData == null) {
                    imageData = canvases.user.getImageData(0, 0, w, h);
                }
                var dx = to.x - from.x;
                var dy = to.y - from.y;
                canvases.user.clearRect(0, 0, w, h);
                canvases.user.putImageData(imageData, dx, dy);
            },
            onDragEnd: function(from, to) {
                imageData = null;
            }
        };
    })(),
    pencil: (function() {
        var prevPos = null;
        return {
            onDrag: function(from, to) {
                var c = canvases.user;
                c.save();
                c.fillStyle = configurations.color;
                c.strokeStyle = configurations.color;
                c.lineWidth = 1;
                if (prevPos != null) {
                    c.beginPath();
                    c.moveTo(prevPos.x, prevPos.y);
                    c.lineTo(to.x, to.y);
                    c.stroke();
                } else {
                    c.fillRect(to.x, to.y, 1, 1);
                }
                c.restore();
                prevPos = to;
            },
            onDragEnd: function(from, to) {
                prevPos = null;
            }
        };
    })(),
    rect: {
        onDrag: function(from, to) {
            var c = canvases.foreground;
            c.clearRect(0, 0, c.canvas.width, c.canvas.height);
            c.save();
            c.fillStyle = configurations.color;
            c.fillRect(from.x, from.y, to.x - from.x, to.y - from.y);
            c.restore();
        },
        onDragEnd: function(from, to) {
            var c = canvases.foreground;
            c.clearRect(0, 0, c.canvas.width, c.canvas.height);
            var c = canvases.user;
            c.save();
            c.fillStyle = configurations.color;
            c.fillRect(from.x, from.y, to.x - from.x, to.y - from.y);
            c.restore();
        }
    }
};

var control = (function() {
    var dragFrom = null;
    return {
        onmousedown: function(e) {
            dragFrom = canvases.getOffset(e);
        },
        onmousemove: function(e) {
            var pos = canvases.getOffset(e);
            var from = dragFrom;
            var tool = tools.selection();
            from && tool && tool.onDrag && tool.onDrag(from, pos);
        },
        onmouseup: function(e) {
            var pos = canvases.getOffset(e);
            var from = dragFrom;
            var tool = tools.selection();
            from && tool && tool.onDragEnd && tool.onDragEnd(from, pos);
            dragFrom = null;
        }
    };
})();

var canvases = {};

var refreshBackground = function(canvas) {
    var gap = 10;
    var fill = false;
    var w = configurations.canvasWidth;
    var h = configurations.canvasHeight;
    for (var i = 0; i < w; i = i + gap) {
        fill = (i % (gap * 2) == 0);
        for (var j = 0; j < h; j = j + gap) {
            if (fill) {
                canvas.fillStyle = '#eeeeee';
                canvas.fillRect(i, j, gap, gap);
            }
            fill = !fill;
        }
    }
};

$(document).ready(function() {
    // Tooltips
    $("#tools-area .btn").tooltip();
    // Canvases
    canvases = {
        background: $("#background-canvas")[0].getContext("2d"),
        user: $("#user-canvas")[0].getContext("2d"),
        foreground: $("#foreground-canvas")[0].getContext("2d"),
        getOffset: function(event) {
            return {
                x: event.pageX - $("#foreground-canvas").offset().left,
                y: event.pageY - $("#foreground-canvas").offset().top
            };
        },
        resizeAll: function() {
            for (var key in canvases) {
                var c = canvases[key];
                if (c.canvas != undefined) {
                    c.canvas.width = configurations.canvasWidth;
                    c.canvas.height = configurations.canvasHeight;
                }
            }
        }
    };
    canvases.resizeAll();
    refreshBackground(canvases.background);
    // Mouse events
    $("#foreground-canvas").bind("mousedown", control.onmousedown) 
        .bind("mousemove", control.onmousemove)
        .bind("mouseup", control.onmouseup);
});