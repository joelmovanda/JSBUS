import * as React from 'react';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import PerfilScreen from '../screens/Perfil';
import EditarPerfil from '../screens/Perfil/EditarPerfil';

const Stack = createNativeStackNavigator();
const PerfilNavigator = props => {
  return (
    <Stack.Navigator screenOptions={{headerShown: false}}>
      <Stack.Screen name={'Perfil'} component={PerfilScreen} />
      <Stack.Screen name={'EditarPerfil'} component={EditarPerfil} />
    </Stack.Navigator>
  );
};
export default PerfilNavigator;
