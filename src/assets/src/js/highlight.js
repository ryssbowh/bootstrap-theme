import hljs from 'highlight.js';

class Highlight
{
    constructor() {
        document.querySelectorAll('code.js-highlight').forEach((el) => {
            this.init(el);
            el.style.opacity = 1;
        });
    }

    init(elem) {
        hljs.highlightElement(elem);
    }
}

window.Highlight = new Highlight;