import  axiosClient from "../axios";

/****************************login***********************************/


export function login({commit} , data) {
 return axiosClient.post('/login',data)
     .then(({data})  => {
        commit('setUser' , data.user);
        commit('setToken', data.token)
        return data ;
     })
}

/****************************logout***********************************/

export function logout ({commit}){
 return axiosClient.post('/logout')
     .then((response) =>{
         commit('setToken' , null)
         return response;
     })
}

/****************************getUser***********************************/

export function getUser ({commit}){

    return axiosClient.get('/user')
        .then((response) =>{
            commit('setUser' , response.data)

            return response;
        })
}

/****************************getProducts***********************************/

export  function getProducts({commit} ,{url = null ,search = '' ,perPage = 10 ,sort_direction,sort_filed}) {
    commit('setProducts' ,[true]) ;// true for loading

    url = url || '/product';
    // axios to make request
  return axiosClient.get(url , {
          params :{search ,
              per_page:perPage,
              sort_direction,
              sort_filed
          }
  })
      .then( (response) =>{
       commit('setProducts',[false , response.data])
    })
      .catch( ()=>{
          commit('setProduct',[false])
      });

    //الاكشن بجيب الداتا والميوتيشن بوزعاا علي الفاريبل

}




