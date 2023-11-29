import React, {useState} from 'react';
import {
  View,
  Text,
  Image,
  StyleSheet,
  useWindowDimensions,
  ScrollView,
} from 'react-native';
import Logo from '../../assets/logo.png';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import {useNavigation} from '@react-navigation/native';
import { AuthContext } from '../../components/context';
const SignInScreen = () => {
  const [email, setEmail] = useState('');
  const [senha, setSenha] = useState('');

  const {signIn}= React.useContext(AuthContext);
  const {height} = useWindowDimensions();
  const navigation = useNavigation();


  const onForgotPasswordPressed = () => {
    navigation.navigate('ForgotPassword');
  };

  const onSignUpPress = () => {
    navigation.navigate('SignUp');
  };

  const loginHandle= (email,senha)=>{
    signIn(email,senha);
  }

  return (
    <ScrollView showsVerticalScrollIndicator={false}>
      <View style={styles.root}>
        <Image
          source={Logo}
          style={[styles.logo, {height: height }]}
          resizeMode="contain"
        />

        <CustomInput
          placeholder="Email"
          value={email}
          setValue={setEmail}
        />
        <CustomInput
          placeholder="Palavra-passe" 
          value={senha}
          setValue={setSenha}
          secureTextEntry
        />

        <CustomButton text="Sign In" onPress={()=>{loginHandle(email,senha)}} />

        <CustomButton
          text="Esqueceu a palavra-passe?"
          onPress={onForgotPasswordPressed}
          type="TERTIARY"
        />

        <CustomButton
          text="Don't have an account? Create one"
          onPress={onSignUpPress}
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
  logo: {
    width: '100%',
    maxWidth: 300,
    maxHeight: 200,
  },
});

export default SignInScreen;
