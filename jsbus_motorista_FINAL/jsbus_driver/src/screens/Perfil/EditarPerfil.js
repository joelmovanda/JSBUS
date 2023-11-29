/* eslint-disable prettier/prettier */
import React,{useEffect, useState} from 'react';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { StyleSheet, View ,Text, TextInput} from 'react-native';
import CustomButton from '../../components/CustomButton';
import { ScrollView } from 'react-native-gesture-handler';
import { useNavigation } from '@react-navigation/native';
import { text } from 'body-parser';

const EditarPerfil = () =>  
{
const navigation= useNavigation();

const [nome,setNome]=useState('');
const [email,setEmail]=useState('');
const [senha,setSenha]=useState('');
const [cartaoCd,setCartaoCd]=useState('');
const [dataNasc,setDataNasc]=useState('');

  
useEffect(()=>{
  getPerfil();
},[]);


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

const EditarUtilizador = async ()=>
{
  var InsertAPIURL='http://10.0.2.2:80/jsbus/EditarMotorista.php';
  var headers={
    'Accept':'application/json ',
    'Content-Type':'application/json',
  };

  var Data={
    nome: nome,
    senha:senha,
    email: email,
    cartaoCd:cartaoCd,
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
      try
      {
        if(response[0].Message=="Motorista Editado com sucesso")
        {
          

          /*************************************Adicionar valores na nova chave */
          AsyncStorage.setItem('nome',nome);
          AsyncStorage.setItem('senha',senha);
          AsyncStorage.setItem('cartaoCidadao',cartaoCd);
          AsyncStorage.setItem('dataNasc',dataNasc);
          
          alert(response[0].Message);
          navigation.navigate('Perfil',{'paramPropKey': 'paramPropValue'});
        }else
        {
          alert(response[0].Message);
        }
      }catch(e)
      {
        console.log(e);
      }
    })
    .catch((error)=>
    {
      alert("ERROR "+error);
    })

}

return (
    <ScrollView showsVerticalScrollIndicator={false}>
      <View style={styles.root}>
        
       <Text style={styles.text2}>Nome</Text>
       <TextInput style={styles.input} placeholder="Nome " value={nome}  onChangeText={text => setNome(text)}/>

       <Text style={styles.text3}>Palavra-Passe</Text>
       <TextInput style={styles.input} placeholder="Palavra-Passe" value={senha} onChangeText={text => setSenha(text)}/>

       <Text style={styles.text}>Cartao de Ciadadao</Text>
       <TextInput style={styles.input} placeholder="Cartao de Ciadadao" value={cartaoCd}  onChangeText={text => setCartaoCd(text)}/>

       <Text style={styles.text}>Data de Nascimento</Text>
       <TextInput style={styles.input} placeholder="Data de Nascimento" value={dataNasc}  onChangeText={text => setDataNasc(text)}/>

       <CustomButton bgColor={"black"} text="Editar" onPress={EditarUtilizador} />
      </View>
    </ScrollView>
  );
};

const styles = StyleSheet.create({
    root: {
      alignItems: 'center',
      padding: 20,
    },
    text:{
      fontSize: 15,
      marginLeft: -230,
      color:'black',
    },
    text2:{
      fontSize: 15,
      marginLeft: -320,
      color:'black',
    },
    text3:{
      fontSize: 15,
      marginLeft: -270,
      color:'black'
    },
    input: {
    borderColor: "gray",
    width: "100%",
    borderWidth: 1,
    borderRadius: 10,
    padding: 10,
    marginBottom:15,
    },
  });
export default EditarPerfil;