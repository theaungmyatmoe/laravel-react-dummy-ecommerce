import React from "react";
import './css/app.css'

import {createRoot} from "react-dom/client";
import {HashRouter, Link, Route, Routes} from "react-router-dom";

const Home = () => (
    <>
        <h1 className="text-red-400">Hello world</h1>
        <Link to="/about">About</Link>

    </>
)
const About = () => <h1>About</h1>
const AppRouter = () => {
    return (
        <HashRouter>
            <Routes>
                <Route path="/" element={<Home/>}/>
                <Route path="/about" element={<About/>}/>
            </Routes>
        </HashRouter>
    )
}


createRoot(document.querySelector('#app')).render(
    <React.StrictMode>
        <AppRouter/>
    </React.StrictMode>
)
