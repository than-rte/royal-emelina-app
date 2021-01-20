// import http from "../lib/http"

// export async function getVenuesAll() {
//   return await http({
//     url: "venues",
//     method: "get"
//   })
// }

export async function getVenueList(params) {
  return await axios({
    url: "venues",
    method: "get",
    params: params
  })
}

export async function getSearchResult(params) {
  return await axios({
    url: "venues/search",
    method: "get",
    params: params
  })
}
