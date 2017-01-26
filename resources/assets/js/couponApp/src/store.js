/**
 * Created by usamaahmed on 8/10/16.
 */
import { compose , applyMiddleware , createStore } from 'redux';
import thunkMiddleware from 'redux-thunk';
import logger from 'redux-logger';
import rootReducer from '../src/reducers/index'
import { initialState } from '../Constants';


let finalCreateStore = compose(applyMiddleware(thunkMiddleware,logger()))(createStore);

function configureStore(initialState) {
    return finalCreateStore(rootReducer, initialState);
}

export default configureStore;