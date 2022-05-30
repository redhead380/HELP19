function startVideoFromCamera(){
    const specs = { video:{width:1080, aspectRatio:4/8}}
    navigator.mediaDevices.getUserMedia(specs).then (stream=>{
        const videoElement = document.querySelector("#video")
        videoElement.srcObject = stream

    }).catch(error=>{console.log(error)})
}
window.addEventListener("DOMContentLoaded", startVideoFromCamera)