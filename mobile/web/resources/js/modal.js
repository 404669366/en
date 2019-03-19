window.modal = function () {
    document.write("<style>body.modalOpen{position: fixed;width: 100%;}</style>");
    var scrollTop;
    var toDo = {
        open: function () {
            scrollTop = document.scrollingElement.scrollTop;
            document.body.classList.add('modalOpen');
            document.body.style.top = -scrollTop + 'px';
        },
        close: function () {
            document.body.classList.remove('modalOpen');
            document.scrollingElement.scrollTop = scrollTop;
        }
    };

    return {
        open: function (modalBox) {
            $(modalBox).show();
            toDo.open();
        },
        close: function (modalBox) {
            $(modalBox).hide();
            toDo.close();
        }
    };
}();
