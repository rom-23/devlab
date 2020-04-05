import axios from 'axios';
const AUTH_TOKEN = '1212';
// return an axios object connected to the API
const Api = axios.create({
    baseURL: '/apip/',
    // timeout: 2500,
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
        "Access-Control-Allow-Origin": "*",
    },
    auth: {
        username: 'janedoe',
        password: 's00pers3cret',
    },
});
Api.defaults.headers.common.Authorization = AUTH_TOKEN;
Api.interceptors.request.use(
    (request) => {
        console.log('Axios interceptor REQUEST ');
        return request;
    },
    (error) => {
        console.log('Axios interceptor REQUEST ERROR');
        Promise.reject(error);
    },
);
Api.interceptors.response.use(
    async (response) => {
        console.log('RESPONSE INTERCEPTOR : ');
        // console.log(response.data);
        // console.log(response.status);
        // console.log(response.statusText);
        // console.log(response.headers);
        // console.log(response.config);
        return response;
    },
    async (error) => {
        console.log('RESPONSE ERROR INTERCEPTOR : ');
        // console.log(error.message);
        // console.log(error.request);
        // console.log(error.config);
        // console.log(error.response.data.message);
        await Promise.reject(error);
    },
);
export default () => Api;
