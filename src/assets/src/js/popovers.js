import { Popover } from 'bootstrap';

class Popovers
{
    constructor() {
        let list = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        list.map((elem) => {
            return this.initPopover(elem);
        });
    }

    initPopover(elem) {
        new Popover(elem);
    }
}

(function() {
    window.Popovers = new Popovers;
})();