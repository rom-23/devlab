'use strict';
import request from '../class/Api.js';

customElements.define('project-card', class ProjectCard extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({mode: 'open'});
        this._template = document.createElement('template');
        this._template.innerHTML = `
            <div>
                <div class="card" id="content">
                 <slot name="button"></slot>
                <div class="resultat"></div>
                </div>
            </div>       
        `;
        const style = document.createElement('style');
        style.textContent = `
                :host {
                        display:block;
                        background:lightgrey;
                    }
                .card {
                    border: 2px dotted grey;
                    margin-bottom: 10px;
                    padding-left: 10px;
                }
                p {
                    color: green;
                }
                .resultat{
                margin-top: 2em;
                }
        `;
        this.shadowRoot.appendChild(style);
        this.shadowRoot.appendChild(this._template.content.cloneNode(true));
    }

    connectedCallback() {
        const result = this.shadowRoot.querySelector('.resultat');
        this.querySelector('.allProject').addEventListener('click', async function (event) {
            event.preventDefault();
            event.stopPropagation();
            await fetch(request(this.name))
                .then(response => {
                    if (response.ok) {
                         response.json().then(data =>
                            Object.entries(data["hydra:member"]).forEach(([key, value]) => {
                                result.innerHTML += `
                                    <p><a href="apip/projects/${value.id}">${value.projectName}</a></p>`;
                            }))
                    } else {
                        throw Error(response.statusText);
                    }
                })
                .catch(error => {
                    alert(error.message);
                });

            // AJAX with Vanilla JS -------------------------------------
            //const request = new XMLHttpRequest();
            // if (!request) {
            //     alert('ERROR :( Cannot create an XMLHTTP instance');
            //     return false;
            // } else {
            //     request.onreadystatechange = function () {
            //         if (this.readyState === 4 && this.status === 200) {
            //             const data = JSON.parse(this.response);
            //             //console.log(data);
            //             Object.keys(data).map(function (objectKey, index) {
            //                 const responseJson = JSON.parse(data[objectKey]);
            //                 Object.entries(responseJson).forEach(([key, value]) => {
            //                     //console.log(`${key} ${value}`);
            //                     result.innerHTML += `
            //                     <p>id : ${value.id} </p>
            //                     <p>Name : ${value.projectName} :</p>
            //                     <p>Description : ${value.projectDesc}</p>
            //                     <p><a href="${urlToCall}/${value.id}">Editer</a></p>
            //                     `;
            //                 });
            //             });
            //
            //         }
            //     };
            //     request.open("GET", urlToCall, true);
            //     //request.withCredentials = true;
            //     // request.setRequestHeader('Content-Type', 'text/plain');
            //     request.send();
            //     // console.log(request.getAllResponseHeaders());
            //     // console.log(request.getResponseHeader("Last-Modified"));
            // }
        });
    };

    disconnectedCallback() {
        console.log(' destroy');
        this.remove();
    }

});
