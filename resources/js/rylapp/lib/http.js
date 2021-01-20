import axios from "axios"

const http = axios.create({
  headers: { "X-Requested-With": "XMLHttpRequest" },
  baseURL: process.env.MIX_BASE_API
})

http.defaults.headers.get["Accept"] = "application/json" // default header for all get request
http.defaults.headers.post["Accept"] = "application/json"

export default http
