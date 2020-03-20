'use strict';

const MYSAMPLEAPP = MYSAMPLEAPP || {};
MYSAMPLEAPP.calculateTax= function (item) {
        return item * 1.40;
    };
MYSAMPLEAPP.product= function (url,apiResponse) {
        this.url = url;
    this.apiResponse = apiResponse;
        this.getApiResponse = function () {
            fetch(this.url)
                .then(response => {
                    if (response.ok) {
                        response.json().then(data=>
                            Object.entries(JSON.parse(data.results)).forEach(([key, value]) => {
                                this.apiResponse.push({this: this, key, value});
                            }));

                    } else {
                        throw Error(response.statusText);
                    }
                })
                .catch(error => {
                    alert(error.message);
                });
            return this.apiResponse;
        };
    };

module.exports = MYSAMPLEAPP;
