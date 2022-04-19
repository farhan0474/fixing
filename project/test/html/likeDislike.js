import React, {usestate} from 'react';
import 'likeDislike.css';
const [like, setlike]= useState(100)
const [dislike,setdislike] = usestate(4)
const [likeactive, setlikeactive] = usestate(false)
const [dislikeactive, setdislikeactive] = usestate(false)

function likef() {
    if (likeactive) {
        setlikeactive(false)
        setlike(like - 1)
    } else {
        setlikeactive(true)
        setlike(like + 1)
        if (dislikeactive) {
            setdislikeactive(false)
            setlike(like+1)
            setlike(dislike - 1)
        }
    }
}

function dislikef() {
    if (dislikeactive) {
        setdislikeactive(false)
        setdislike(dislike - 1)
    } else {
        setdislikeactive(true)
        setdislike(dislike + 1)
        if (likeactive) {
            setlikeactive(false)
            setdislike(dislike+1)
            setlike(like - 1)
        }
    }
}

export default likeDislike;