'use strict';
import request from '../class/Api.js';

customElements.define('project-details', class ProjectDetailsElement extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({mode: 'open'});
        this._projectname = '';
        this._template = document.createElement('template');
        this._template.innerHTML = `
        <details>
            <summary>
               <slot name="links"></slot>
                </summary>
                <div class="attributes">
                    <slot name="attributes"><p></p></slot>
                </div>
        </details>
        `;
        const style = document.createElement('style');
        style.textContent = `
        :host {
                display:block;
                background:lightgrey;
            }
            details {
                font-family: "Open Sans Light", Helvetica, Arial
            }
            .name {
                font-weight: bold;
                color: #217ac0;
                font-size: 120%
            }
            .attributes {
                margin-left: 22px;
                font-size: 90%
            }
            .attributes p {
                margin-left: 16px;
                font-style: italic
            }
        `;

        this.shadowRoot.appendChild(style);
        this.shadowRoot.appendChild(this._template.content.cloneNode(true));

    }

    static get observedAttributes() {
        return ['project-name'];
    }

    get projectName() {
        return this._projectname;
    }

    set projectName(value) {
        this.setAttribute('project-name', JSON.stringify(value));
    };

    connectedCallback() {
        this._projectname = this.getAttribute('project-name');
        console.log(this._projectname);
        const spanSuite = this.querySelector('.suite');
        const secondSuite = this.querySelector('.secondsuite');
        this.querySelectorAll('.displayData').forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                fetch(request(this.name))
                    .then(response => {
                        if (response.ok) {
                            response.json().then(data => {
                                secondSuite.innerHTML = `<p>${data.projectDesc}</p>`;
                            })
                        } else {
                            throw Error(response.statusText);
                        }
                    })
                    .catch(error => {
                        alert(error.message);
                    });
            })
        });
        //this.render();
    }

    disconnectedCallback() {
        this.removeEventListener('click', this.click);
    }

    render() {
        //this.shadowRoot.appendChild(template.cloneNode(true));
        //this.shadowRoot.querySelector('h2').textContent = this._firstname;

        this.shadowRoot.appendChild(this._template.content.cloneNode(true));
    }

    attributeChangedCallback(name, oldVal, newVal) {
        if (name === 'project-name') {
            this._projectname = newVal;
        }
        // else {
        //     this._lastname = newVal;
        // }
        //this.render();
    }

});

