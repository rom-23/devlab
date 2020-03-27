'use strict';

const baseUrl = '/apip/';
const myInit = {
    method: 'GET',
    headers: create_headers(),
    mode: 'cors',
    cache: 'default'
};
const request = function(url){
      return new Request(baseUrl+url,myInit);
};

function create_headers() {
    return new Headers({
        "Content-Type": "application/json",
        // "Access-Control-Allow-Credentials": true,
        "Access-Control-Allow-Origin": "*"
    });
}

module.exports =  request;
