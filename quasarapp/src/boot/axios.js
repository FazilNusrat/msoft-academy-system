import axios from 'axios'

export const setBaseUrl = strUrl => {
    axios.defaults.baseURL = strUrl
}
const defaultInterceptor = store => {
    // register a standard request interceptor
    axios.interceptors.request.use(
            config => {
                // Do something before request is sent
                console.log(
                    '%c[REQUEST] sent -> ' + config.url,
                    'color: blue; font-weight: bold;',
                    config
                )
                return config
            },
            error => {
                // Do something with request error
                console.log(
                    '%c[REQUEST] error -> ' + error.config.url,
                    'color: red; font-weight: bold;',
                    error.message || error
                )
                return Promise.reject(error)
            }
        )
        // Add a response interceptor
    axios.interceptors.response.use(
        response => {
            // Do something with response data
            console.log(
                    '%c[RESPONSE] received -> ' + response.config.url,
                    'color: green; font-weight: bold;',
                    response
                )
                // store.dispatch('commons/testRouter')
                // notif()
                // notif = Notify.create({
                //   color: 'positive',
                //   icon: 'mdi-check',
                //   message: response.data.message,
                //   timeout: 1500
                // })
            return response
        },
        error => {
            // Do something with response error
            /**
             * @error object
             * @errorDotresponse only exist if the server responded with an error,
             * else it's a generic error object
             */
            console.log(
                '%c[RESPONSE] error ->' + error.config.url,
                'color: red; font-weight: bold;',
                error.response || error.message
            )
            let message = ''
            if (error.response !== undefined) {
                if (typeof error.response.data.message === 'object') {
                    console.log('message', error.response.data.message)
                        // message = error.response.message
                    let messages = error.response.data.message
                    for (let k in messages) {
                        console.log(messages[k])
                        if (Array.isArray(messages[k])) {
                            message = messages[k].join(' ')
                        }
                    }
                } else {
                    message = error.response.data.message
                }
            } else {
                message = error.message
            }

            // notif()
            // notif = Notify.create({
            //   color: 'negative',
            //   icon: 'mdi-alert-circle-outline',
            //   message: message,
            //   timeout: 2000
            // })
            // return the error object
            return Promise.reject(error)
        }
    )
}
const appMode = type =>
    ({
        test: 'https://b9g95.sse.codesandbox.io/',
        // laravel: 'http://192.168.1.4:8000/a/pi',
        laravel: 'http://localhost:8000/api',
        production: 'http://localhost:8000/api'
            // get mobile () {
            //   return Platform.is.cordova ? this.local : this.test
            // }
    }[type])
export default ({ Vue, store }) => {
    // const url = store.state['commons'].targetUrl || appMode('vhost')
    // set axios defaults
    axios.defaults.baseURL = appMode(process.env.DEV ? 'laravel' : 'production')
    axios.defaults.headers.post['Content-Type'] = 'application/json'
    axios.defaults.withCredentials = true;
    // axios.defaults.timeout = 2000
    // add axios generic interceptor
    defaultInterceptor(store)
        // process.env.DEV && defaultInterceptor()
        // customInterceptor(store)
        // const token = store.getters['auth/getField']('token')
        // if (token) {
        //   setAuthHeader(token)
        // }

    // set custom header for the client or device information
    // const deviceInfo = store.getters['commons/getField']('deviceInfo')
    // const quasarInfo = Platform.is
    // const clientInfo = deviceInfo
    //   ? { client: quasarInfo, device: deviceInfo }
    //   : { client: quasarInfo }
    // if (clientInfo) {
    //   setClientInfoHeader(clientInfo)
    // }

    Vue.prototype.$axios = axios
}
// const axiosInstance = axios.create({
//   baseURL: 'http://localhost:8000/api'
// })
// export default ({ Vue }) => {
//   Vue.prototype.$axios = axiosInstance
// }
export { axios }
