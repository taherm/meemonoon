/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */


//window._ = require('lodash');
//window.$ = window.jQuery = require('jquery');
//require('bootstrap-sass');
//require('./bootstrap')
import React , { Component } from 'react';
import { render } from 'react-dom';
import Root from '../js/couponApp/Root';


$(document).ready(function () {

    render(<Root />, document.getElementById('couponApp'));

});


