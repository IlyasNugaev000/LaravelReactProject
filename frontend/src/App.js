import React from 'react';
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom';

import MainForm from "./pages/MainForm";
import Lending from "./pages/Lending";

import 'bootstrap/dist/css/bootstrap.css';

import axios from 'axios';
axios.defaults.baseURL = "http://localhost:8086/";

export default function App() {

    return (
        <div className="App">
            <Router>
                <Switch>
                    <Route path="/mainForm" component={MainForm} />
                    <Route path="/lending" component={Lending} />
                </Switch>
            </Router>
        </div>
    );
}