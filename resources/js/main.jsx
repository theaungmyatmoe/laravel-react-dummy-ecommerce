import React from "react";

import {createRoot} from "react-dom/client";
import {BrowserRouter, Link, Route, Routes} from "react-router-dom";

const Home = () => (
    <>
        <h1>Hello world</h1>
        <Link to="/about">About</Link>
    </>
)
const About = () => <h1>About</h1>
const AppRouter = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Home/>}/>
                <Route path="/about" element={<About/>}/>
            </Routes>
        </BrowserRouter>
    )
}


createRoot(document.querySelector('#app')).render(
    <React.StrictMode>
        <AppRouter/>
    </React.StrictMode>
)
