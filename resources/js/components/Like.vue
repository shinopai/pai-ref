<template>
    <span v-if="isLiked" class="inline-block px-3 py-1 text-sm font-semibold text-blue-700 mr-2 border cursor-pointer" @click="unlikePhoto">
      <span class="material-icons" style="vertical-align: -6px;">
          star
      </span>
      お気に入り登録 | {{ likes.length }}
  <span class="material-icons" style="vertical-align: -6px;">
done
</span>
登録済
  </span>
    <span v-else class="inline-block px-3 py-1 text-sm font-semibold text-blue-700 mr-2 border cursor-pointer" @click="likePhoto">
      <span class="material-icons" style="vertical-align: -6px;">
          star
      </span>
      お気に入り登録 | {{ likes.length }}
  </span>
</template>

<script>
import { ref, onMounted } from 'vue'
import Axios from 'axios'

export default {
  setup() {
    const likes = ref([])
    const url = location.href
    const photoId = ref()
    const currentUserName = ref()
    let isLiked = ref(Boolean)

    photoId.value = url.split("/")[(url.split("/").length) - 1]

    // get current user name
    const getCurrentUserName = async () => {
      await Axios.get('/api/user')
                 .then( res => {
                   currentUserName.value = res.data
                   checkIsLike(currentUserName.value)
                 })
                 .catch( err => {
                   console.log(err.response.data)
                 })
    }

    // get all likes that this photo has
    const getAllLikes = async () => {
      await Axios.get('/api/photos/' + photoId.value + '/likes')
                 .then( res => {
                   likes.value = res.data
                 })
                 .catch( err => {
                   console.log(err.response.data)
                 })
    }

    // like this photo
    const likePhoto = async () => {
      await Axios.post('/api/users/' + currentUserName.value + '/photos/' + photoId.value + '/like_photo')
                 .then( res => {
                    getCurrentUserName()
                    getAllLikes()
                 })
                 .catch( err => {
                   console.log(err.response.data)
                 })
    }

    // unlike this photo
    const unlikePhoto = async () => {
      await Axios.post('/api/users/' + currentUserName.value + '/photos/' + photoId.value + '/unlike_photo')
                 .then( res => {
                    getCurrentUserName()
                    getAllLikes()
                 })
                 .catch( err => {
                   console.log(err.response.data)
                 })
    }

     // check if user likes this photo
    const checkIsLike = async (userName) => {
      await Axios.get('/api/users/' + userName + '/photos/' + photoId.value + '/check_is_liked')
                 .then( response => {
                   console.log(response.data)
                   if(response.data.length > 0){
                     isLiked.value = true
                   }else{
                     isLiked.value = false
                   }
                 })
                 .catch( error => {
                   console.log(error.response.data)
                 })
    }

    onMounted(() => {
      getCurrentUserName()
      getAllLikes()
    })

    return {
      likes, likePhoto, unlikePhoto, isLiked
    }
  },
}
</script>
