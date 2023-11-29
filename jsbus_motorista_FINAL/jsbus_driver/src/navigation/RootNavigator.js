import * as React from 'react';
import {View, Text, ScrollView, Image} from 'react-native';
import {NavigationContainer} from '@react-navigation/native';
import HomeNavigator from './HomeNavigator';
import {createDrawerNavigator} from '@react-navigation/drawer';
import CustomDrawer from './CustomDrawer';
import PerfilNavigator from './PerfilNavigator';
import HistoricoViagemScreen from '../screens/HistoricoViagemScreen';

const Drawer = createDrawerNavigator();

const RootNavigator = props => {
  return (
    <NavigationContainer>
      <Drawer.Navigator drawerContent={props => <CustomDrawer {...props} />}>
        <Drawer.Screen name="Home" component={HomeNavigator} />
        <Drawer.Screen name="Perfil" component={PerfilNavigator} />
        <Drawer.Screen
          name="Historico de Viagem"
          component={HistoricoViagemScreen}
        />
      </Drawer.Navigator>
    </NavigationContainer>
  );
};
export default RootNavigator;
