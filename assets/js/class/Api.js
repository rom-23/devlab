'use strict';

let Api = class {

    constructor(url) {
        this._url = url;
        this._apiResponse = [];
        this._chaine = '';
        this.tev2 = '';
        this._template = document.createElement('code');
        this._myHeaders = new Headers({
            "Content-Type": "application/json",
            // "Access-Control-Allow-Credentials": true,
            // "Access-Control-Allow-Origin": "*"
        });
        this._myInit = {
            method: 'GET',
            headers: this._myHeaders,
            //mode: 'cors',
            cache: 'default'
        };
        this.fetchJSON();
    }


    get apiResponse() {
        return this._apiResponse;
    }

    set apiResponse(value) {
        this._apiResponse = value;
    }

    logError(error) {
        console.log('Looks like there was a problem: \n', error);
    }

    validateResponse(response) {
        if (!response.ok) {
            throw Error(response.statusText);
        }
        return response.json();
    }


    fetchJSON() {
        fetch(this._url, this._myInit)
            .then(this.validateResponse)
            .then(data => Object.entries(JSON.parse(data.results)).forEach(([key, value]) => {
                this._apiResponse.push(value.projectName);
                console.log(this._template);

                this._template.innerHTML = `
${value.projectName}
`;
                // console.log(this._template);
            }))
            .catch(this.logError)
    }



};
module.exports = Api;
