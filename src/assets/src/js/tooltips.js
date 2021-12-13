import { Tooltip } from 'bootstrap';

class Tooltips
{
    constructor() {
        let list = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        list.map((elem) => {
            return this.initTooltip(elem);
        });
    }

    initTooltip(elem) {
        new Tooltip(elem);
    }
}

(function() {
    window.Tooltips = new Tooltips;
})();