'use strict';
const axios = require ('axios');
let test = class {

    constructor(name) {
        this._name = name;

    };

    get name() {
        return this._name;
    };

    set name(value) {
        this._name = value;
    };

    greet() {
        return `Hello, my name is ${this.name}!`;
    };
static dataBaseAccess(){
    axios.get('http://127.0.0.1:8000/project/1').then(function (response) {

        const displayJson = JSON.parse(response.data[0]);
        console.log(displayJson);
    });
}
    static testMe(exclamationCount) {
        return 'First function'.repeat(exclamationCount);
    };
};
module.exports = test;
