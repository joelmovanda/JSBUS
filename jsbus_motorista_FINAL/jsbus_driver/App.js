
import React, {useEffect} from 'react';
import {
  StatusBar,
  PermissionsAndroid,
  Platform,
  ActivityIndicator,
  View,
} from 'react-native';
import Router from './src/navigation/RootNavigator';
import {SafeAreaView, StyleSheet, Text} from 'react-native';
import Navigation from './src/navigation';
import {AuthContext} from './src/components/context';
import AsyncStorage from '@react-native-async-storage/async-storage';

const App = () => {
  let horarios = [];
  let rotas = [];

  const intialLoginState = {
    isLoading: true,
    email: null,
    userToken: null,
  };

  const loginReducer = (prevState, action) => {
    switch (action.type) {
      case 'RETRIVE_TOKEN':
        return {
          ...prevState,
          userToken: action.token,
          isLoading: false,
        };
      case 'LOGIN':
        return {
          ...prevState,
          email: action.id,
          userToken: action.token,
          isLoading: false,
        };
      case 'LOGOUT':
        return {
          ...prevState,
          email: null,
          userToken: null,
          isLoading: false,
        };
      case 'REGISTER':
        return {
          ...prevState,
          email: action.id,
          userToken: action.token,
          isLoading: false,
        };
    }
  };
  const [loginState, dispatch] = React.useReducer(
    loginReducer,
    intialLoginState,
  );

  // eslint-disable-next-line react-hooks/exhaustive-deps
  const authContext = React.useMemo(() => ({
    signIn: async (email, senha) => {
      let userToken = null;
      userToken = null;

      var InsertAPIURL = 'http://10.0.2.2:80/jsbus/getMotorista.php';
      var headers = {
        Accept: 'application/json ',
        'Content-Type': 'application/json',
      };

      var Data = {
        email: email,
      };

      fetch(InsertAPIURL, {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(Data),
      })
        .then(response => response.json())
        .then(response => {
          if (email == response[0].email && senha == response[0].senha &&(email!='' && senha!='')) {
            userToken = 'fghj';
            try {
              AsyncStorage.setItem('nome', response[0].nome);
              AsyncStorage.setItem('email', email);
              AsyncStorage.setItem('senha', senha);
              AsyncStorage.setItem('cartaoCidadao', response[0].cartaoCidadao);
              AsyncStorage.setItem('dataNasc', response[0].dataNasc);
              AsyncStorage.setItem('userToken', userToken);
            } catch (e) {
              console.log(e);
            }
          } else {
            alert('Senha ou email invalido ');
          }
          dispatch({type: 'LOGIN', id: email, token: userToken});
        })
        .catch(error => {
          alert('ERROR ' + error);
        });
    },
    signOut: async () => {
      try {
        AsyncStorage.clear();
      } catch (e) {
        console.log(e);
      }
      dispatch({type: 'LOGOUT'});
    },
    signUp: () => {},
  }));

  useEffect(() => {
    setTimeout(async () => {
      let userToken;
      userToken = null;
      try {
        AsyncStorage.getItem('userToken');
      } catch (e) {
        console.log(e);
      }
      dispatch({type: 'RETRIVE_TOKEN', token: userToken});
    }, 1000);
  }, []);

  if (loginState.isLoading) {
    return (
      <View styles={{flex: 1, justifyContent: 'center', alignItems: 'center'}}>
        <ActivityIndicator size="large" />
      </View>
    );
  }

  return (
    <AuthContext.Provider value={authContext}>
      <SafeAreaView style={styles.root}>
        {
          loginState.userToken != null ? (
            <Router /> //pagina do passageiro
          ) : (
            <Navigation />
          ) //se não vai para menu do login
        }
      </SafeAreaView>
    </AuthContext.Provider>
  );
};

const styles = StyleSheet.create({
  root: {
    flex: 1,
    backgroundColor: '#F9FBFC',
  },
});
export default App;
