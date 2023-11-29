import React,{useState,useEffect} from 'react';
import { View ,Text, Pressable} from 'react-native';
import  {DrawerContentScrollView,DrawerItemList}from '@react-navigation/drawer';
import { AuthContext } from '../components/context';
import Icon, { Exit } from 'react-native-vector-icons/MaterialCommunityIcons';
import AsyncStorage from '@react-native-async-storage/async-storage';

const CustomDrawer = (props) =>  {

const {signOut}= React.useContext(AuthContext);

useEffect(()=>{
   
  },[]);

const getNome = async () => {
    try {
      const userNome = await AsyncStorage.getItem('nome');
      if(userNome !== null) {
        setNome(userNome);
      }
    } catch(e) {
      alert(e);
    }
  }
const [nome,setNome]=useState('');
getNome();
  return (
      <DrawerContentScrollView>
            <View style={{backgroundColor: '#212121', padding:15}}>
                
                <View style= {{
                    flexDirection:'row',
                    alignItems:'center',
                }}>
                    <View style={{
                        backgroundColor:'#cacaca',
                        width:50,
                        height:50,
                        borderRadius:25,
                        marginRight:10,
                    }}/>
                    <View>
                        <Text style={{color:'white',fontSize:24}}>{nome} </Text>    
                    </View>    
                </View>
                <View style ={{ 
                    borderBottomWidth: 1,
                    borderBottomColor:'#919191',
               
                    paddingVertical: 5,
                    marginVertical:5,
                    }}>
                    <Pressable onPress ={()=> {signOut()} }>
                        <Icon name='exit-to-app' size={25} color='white'></Icon>
                        
                    </Pressable>
                </View> 
            </View>  
            <DrawerItemList {...props}/>
      </DrawerContentScrollView>
      
  );
};
export default CustomDrawer;