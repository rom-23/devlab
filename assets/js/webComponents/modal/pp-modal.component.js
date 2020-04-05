import request from '../../class/Api.js';
class Modal extends HTMLElement {
    constructor() {
        super();
        this._modalVisible = false;
        this._modal;

        this.attachShadow({ mode: 'open' });
        this.shadowRoot.innerHTML = `
        <style>
            /* The Modal (background) */
            .modal {
                display: none; 
                position: fixed; 
                z-index: 1000; 
                padding-top: 100px; 
                left: 0;
                top: 0;
                width: 100%; 
                height: 100%; 
                overflow: auto; 
                background-color: rgba(0,0,0,0.4); 
            }
            /* Modal Content */
            .modal-content {
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: 1px solid #888;
                width: 80%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }
            /* Add Animation */
            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0} 
                to {top:0; opacity:1}
            }
            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }
            /* The Close Button */
            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }
            .close:hover,
            .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            }
            .modal-header {
            padding: 2px 16px;
            background-color: #000066;
            color: white;
            }
            .modal-body {padding: 2px 16px; margin: 20px 2px}
        </style>
        <button>Open Modal</button>
        <div class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <slot name="header"><h1>Default text</h1></slot>
                </div>
                <div class="modal-body">               
                </div>
            </div>
        </div>
        `
    }
    set content(value) {
        this.setAttribute('content', JSON.stringify(value));
    }

    get content() {
        return this._content;
    }
    connectedCallback() {
        this._modal = this.shadowRoot.querySelector(".modal");
        this._content = this.getAttribute('content');
        this.shadowRoot.querySelector("button").addEventListener('click', this._showModal.bind(this));
        this.shadowRoot.querySelector(".close").addEventListener('click', this._hideModal.bind(this));
    }
    disconnectedCallback() {
        this.shadowRoot.querySelector("button").removeEventListener('click', this._showModal);
        this.shadowRoot.querySelector(".close").removeEventListener('click', this._hideModal);
    }
    static get observedAttributes() {
        return ['content'];
    }
    attributeChangedCallback(name, oldVal, newVal) {
        if (name === 'content') {
            this._content = newVal;
        }
    }
    _showModal() {
        // fetch(request(this._content))
        //     .then(response => {
        //         if (response.ok) {
        //             response.json().then(data =>
        //                 Object.entries(data["hydra:member"]).forEach(([key, value]) => {
        //                     this.shadowRoot.querySelector(".modal-body").innerHTML += `
        //                             <p><a href="project/${value.id}">${value.projectName}</a></p>`;
        //                 }))
        //         } else {
        //             throw Error(response.statusText);
        //         }
        //     })
        //     .catch(error => {
        //         alert(error.message);
        //     });

        this.shadowRoot.querySelector(".modal-body").innerHTML=this._content;
        this._modalVisible = true;
        this._modal.style.display = 'block';
    }
    _hideModal() {
        this._modalVisible = false;
        this._modal.style.display = 'none';
    }
}
customElements.define('pp-modal',Modal);
