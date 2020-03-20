import axios from 'axios';
customElements.define('user-card', class UserCardElement extends HTMLElement {
    set firstName(value) {
        this.setAttribute('first-name', value);
    };

    get firstName() {
        return this._firstname;
    }

    set lastName(value) {
        this.setAttribute('last-name', value);
    }

    get lastName() {
        return this._lastname;
    }

    constructor() {
        super();
        this.attachShadow({mode: 'open'});
        this.shadowRoot.innerHTML = `
    <style>
    :host {
    --bg: #089e00;
    }
    h2 {
    /*color: #1c7430;*/
    color: var(--bg);
    }
    ::slotted(p){
    color: #ff38b9;
    }
    </style>
    <slot name="links"></slot>
    <slot name="description"></slot>
    `
    }

    connectedCallback() {
        this._firstname = this.getAttribute('first-name');
        this._lastname = this.getAttribute('last-name');
        // this.shadowRoot.querySelector('h2').addEventListener(
        //     'click', (event) => {
        //         this.dispatchEvent(new MouseEvent('titre-click', event));
        //     });
        const spanSuite = this.querySelector('.suite');
        this.querySelectorAll('.displayData').forEach(function(link){
            link.addEventListener('click',function(event){
                event.preventDefault();
                const url = this.href;
                axios.get(url).then(function(response){
                    console.log(response.data[0].userName);
                    spanSuite.textContent=response.data[0].userName;
                });

            })});
        this.render();
    }

    disconnectedCallback(){

    }

    render() {
        this.shadowRoot.querySelector('h2').textContent = this._firstname + ' ' + this._lastname;

    }

    static get observedAttributes() {
        return ['first-name', 'last-name'];
    }

    attributeChangedCallback(name, oldVal, newVal) {
        if (name === 'first-name') {
            this._firstname = newVal;
        } else {
            this._lastname = newVal;
        }
        this.render();
    }

});

