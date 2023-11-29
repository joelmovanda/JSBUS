import React, {useState} from 'react';
import {View, Text, StyleSheet, ScrollView} from 'react-native';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import {useNavigation} from '@react-navigation/core';

const SignUpScreen = () => {
  const [nome_passageiro, setNome_Passageiro] = useState('');
  const [email, setEmail] = useState('');
  const [senha, setSenha] = useState('');
  const [passwordRepeat, setPasswordRepeat] = useState('');
  const [cartaoCidao, setCartaoCidadao] = useState('');
  const [dataNasc, setDataNasc] = useState('');
  var checkEmail = RegExp(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i);

  /*   
  if ((Email.length==0) || (Password.length==0) || (ConfirmPw.length==0)){
      alert("Required Field Is Missing!!!");
    }else if (!(checkEmail).test(Email)){
      alert("invalid email!!!");
    }
    // Password validations
    else if (Password.length<8){
      alert("Minimum 08 characters required!!!");
    }else if (!((/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/).test(Password))){
      alert("Use atleast 01 special character!!!");
    }else if (((/[ ]/).test(Password))){
      alert("Don't include space in password!!!");
    }else if(Password !== ConfirmPw){
      alert("Password doesnot match!!!");
    }
  */

  const navigation = useNavigation();

  const onRegisterPressed = () => {
    //

    if (nome_passageiro.length==0 || email.length==0 || senha.length==0
      || passwordRepeat.length==0 || cartaoCidao.length<9 || cartaoCidao.length>9 ||dataNasc.length==0)
      {
        alert("Campos mal preencidos ou campos em falta");
      }else
      {
        var InsertAPIURL='http://10.0.2.2:80/jsbus/InsertPassageiro.php';
        var headers={
          'Accept':'application/json ',
          'Content-Type':'application/json',
        };

        var Data={
          nome_passageiro: nome_passageiro,
          senha:senha,
          email: email,
          cartaoCidadao:cartaoCidao,
          dataNasc: dataNasc
        };

        fetch(InsertAPIURL, 
          {
            method:'POST',
            headers: headers,
            body: JSON.stringify(Data)
          })
          .then((response)=> response.json())
          .then((response) =>
          {
            alert(response[0].Message);
          })
          .catch((error)=>
          {
            alert("ERROR "+error);
          })



        navigation.navigate('SignIn');
      }
  };

  const onSignInPress = () => {
    navigation.navigate('SignIn');

  };

  const onTermsOfUsePressed = () => {
    console.warn('onTermsOfUsePressed');
  };

  const onPrivacyPressed = () => {
    console.warn('onPrivacyPressed');
  };

  return (
    <ScrollView showsVerticalScrollIndicator={false}>
      <View style={styles.root}>
        <Text style={styles.title}>Criar nova conta</Text>

        <CustomInput
          placeholder="Nome"
          value={nome_passageiro}
          setValue={setNome_Passageiro}
        />
        <CustomInput placeholder="Email" value={email} setValue={setEmail} />
        <CustomInput
          placeholder="Palavra-passe"
          value={senha}
          setValue={setSenha}
          secureTextEntry
        />
        <CustomInput
          placeholder="Palavra-Passe Novamente"
          value={passwordRepeat}
          setValue={setPasswordRepeat}
          secureTextEntry
        />

        <CustomInput
          placeholder="Cartão de cidadão"
          value={cartaoCidao}
          setValue={setCartaoCidadao}
          secureTextEntry
        />

        <CustomInput
          placeholder="Data de Nascimento"
          value={dataNasc}
          setValue={setDataNasc}
          
        />

        <CustomButton text="Register" onPress={onRegisterPressed} />

        <Text style={styles.text}>
          By registering, you confirm that you accept our{' '}
          <Text style={styles.link} onPress={onTermsOfUsePressed}>
            Terms of Use
          </Text>{' '}
          and{' '}
          <Text style={styles.link} onPress={onPrivacyPressed}>
            Privacy Policy
          </Text>
        </Text>

        <CustomButton
          text="Have an account? Sign in"
          onPress={onSignInPress}
          type="TERTIARY"
        />
      </View>
    </ScrollView>
  );
};

const styles = StyleSheet.create({
  root: {
    alignItems: 'center',
    padding: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#051C60',
    margin: 10,
  },
  text: {
    color: 'gray',
    marginVertical: 10,
  },
  link: {
    color: '#FDB075',
  },
});

export default SignUpScreen;
