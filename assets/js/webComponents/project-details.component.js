'use strict';
import axios from 'axios';

customElements.define('project-details', class ProjectDetailsElement extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({mode: 'open'});
        this._projectname = '';
        this._template = document.createElement('template');
        this._template.innerHTML = `
        <details>
            <summary>
          <span>
            <code class="name">&lt<slot name="links">NEED NAME</slot>&gt;</code>
            <i class="desc"><slot name="description">NEED DESCRIPTION</slot></i>
          </span>
                </summary>
                <div class="attributes">
                    <h4><span>Attributes</span></h4>
                    <slot name="attributes"><p>None</p></slot>
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

            h4 {
                margin: 10px 0 -8px 0;
            }

            h4 span {
                background: #217ac0;
                padding: 2px 6px 2px 6px
            }

            h4 span {
                border: 1px solid #cee9f9;
                border-radius: 4px
            }

            h4 span {
                color: white
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
                const url = this.href;
                axios.get(url).then(function (response) {
                    const displayJson = JSON.parse(response.data[0]);

                    console.log(displayJson);
                    //this.querySelector('.displayBase').appendChild((displayJson.projectName.cloneNode(true)))
                    //spanSuite.textContent=displayJson.projectName+' '+displayJson.projectDesc;
                    spanSuite.innerHTML = displayJson.projectDesc;
                    var p = new Date(displayJson.createdAt.timestamp * 1e3).toISOString().slice(-13, -5);
                    //var p = Date.parse(displayJson.createdAt);

                    secondSuite.innerHTML = p;

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

