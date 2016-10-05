/**
 * Created by usamaahmed on 8/10/16.
 */
import React , { Component } from 'react';
import { render } from 'react-dom';
import { Provider , connect } from 'react-redux';
import configureStore  from '../../js/couponApp/src/store';
import { bindActionCreators } from 'redux';
import couponActions from '../../js/couponApp/src/actions/couponActions'
import { initialState } from '../../js/couponApp/Constants';
import App from '../../js/couponApp/App';


//1- create the store
//2- create the reducers
//3- create the actions
//4- connect all props and dispatch with the app componenet

var store = configureStore(initialState);

export default class Root extends Component {

    constructor(props, content) {
        super(props, content);
    }

    render() {
        return (
            <Provider store={store}>
                <App />
            </Provider>
        );
    }
}

