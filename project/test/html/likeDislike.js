import React, {usestate} from 'react';
import ./App.css';
function App() {
    const [like, setlike]- useState(100)
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
        }
    }

    function dislikef() {
    }

    return (
        <div className="App">
            <div></div>
            <button onclick={likef}>Like (like}</button>
            <button onclick={dislikef}>Dislike {dislike}</button>
        </div>
    );
}