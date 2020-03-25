//import axios from 'axios';
//import Api from '../class/Api';
//const Api = require('../class/ApiClass');
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
        let myHeaders = new Headers({
            "Content-Type": "application/json",
            // "Access-Control-Allow-Credentials": true,
            "Access-Control-Allow-Origin": "*"
        });
        let myInit = {
            method: 'GET',
            headers: myHeaders,
            mode: 'cors',
            cache: 'default'
        };
        const result = this.shadowRoot.querySelector('.resultat');
        this.querySelector('.allProject').addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            const urlToCall = this.href;


            //AJAX with module class
            //   let api = new Api(urlToCall);
            //   console.log(api._template);
            //   const calque = document.createElement('div');
            //
            // result.innerHTML=`${api._template}`;
            // calque.appendChild(result);
// const newProduct = new MYSAMPLEAPP.product(urlToCall,[]);
// console.log(newProduct.getApiResponse());
// result.innerHTML+=`<pre>${newProduct.getApiResponse()}</pre>`;
//alert(newProduct.doTaxCalculations);

            //AJAX with Fetch Api
            fetch(urlToCall, myInit)
                .then(response => {

                    if (response.ok) {

                        response.json().then(data =>
                            // console.log(data["hydra:member"]))
                            Object.entries(data["hydra:member"]).forEach(([key, value]) => {
                                result.innerHTML += `<p><a href="/apip/projects/${value.id}">${value.projectName}</a></p>`;
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

            // AJAX with axios require -------------------------------------
            // axios.get(urlToCall).then(function (response) {
            // const data = JSON.parse(response.data[0]);
            //      data.forEach(obj => {
            //         Object.entries(obj).forEach(([key, value]) => {
            //             console.log(`${key} ${value}`);
            //             result.innerHTML+=`<p>${key} ${value}</p>`;
            //         })});
            //
            // });
        });
    };

    disconnectedCallback() {
        console.log(' destroy');
        this.remove();
    }

});
