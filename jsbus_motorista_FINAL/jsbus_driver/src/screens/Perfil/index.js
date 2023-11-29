/* eslint-disable prettier/prettier */
import React,{useEffect, useState} from 'react';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { StyleSheet, View ,Text, SafeAreaView, SectionList, StatusBar} from 'react-native';
import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useRoute } from '@react-navigation/native';

const PerfilScreen = () =>  
{

const navigation= useNavigation();
const route =useRoute();   
const goToEditarPerfil =() =>{
  navigation.navigate('EditarPerfil');
}
const [nome,setNome]=useState('');
const [email,setEmail]=useState('');
const [senha,setSenha]=useState('');
const [cartaoCd,setCartaoCd]=useState('');
const [dataNasc,setDataNasc]=useState('');
 
useEffect(() => {
  getPerfil();
});

useEffect(() => {
  getPerfil();
}, [route]);
  

const getPerfil = async () => 
{
  try 
  {
    const userEmail = await AsyncStorage.getItem('email');
    const userNome = await AsyncStorage.getItem('nome');
    const userDataNasc = await AsyncStorage.getItem('dataNasc');
    const userCartaoCd = await AsyncStorage.getItem('cartaoCidadao');
    const userSenha = await AsyncStorage.getItem('senha');
    setNome(userNome);
    setEmail(userEmail);
    setSenha(userSenha);
    setCartaoCd(userCartaoCd);
    setDataNasc(userDataNasc);
    
  }catch(e) 
  {
    alert(e);
  }
}
getPerfil();
const DATA = [
  {
    title: "Nome",
    data: [nome]
  },
  {
    title: "Email",
    data: [email]
  },
  {
    title: "Palavra-passe",
    data: [senha]
  },
  {
    title: "Cartão de cidadão",
    data: [cartaoCd]
  },
  {
    title: "Data Nasc",
    data: [dataNasc]
  },
];

const Item = ({ title }) => (
  <View style={styles.item}>
    <Text style={styles.title}>{title}</Text>
  </View>
);

   
  return (
    <SafeAreaView style={styles.container}>
    <SectionList
      sections={DATA}
      keyExtractor={(item, index) => item + index}
      renderItem={({ item }) => <Item title={item} />}
      renderSectionHeader={({ section: { title } }) => (
        <Text style={styles.header}>{title}</Text>
      )}
    />
    <CustomButton bgColor={"black"} text="Editar" onPress={goToEditarPerfil} />
  </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    paddingTop: StatusBar.currentHeight,
    marginHorizontal: 16
  },
  item: {
    backgroundColor: "grey",
    padding: 10,
    marginVertical: 5
  },
  header: {
    fontSize: 20,
    backgroundColor: "#fff"
  },
  title: {
    fontSize: 20, 
  },
  button:{
    fontSize: 20, 
  }
});
export default PerfilScreen;