import * as React from 'react';
import HomeScreen from '../screens/HomeScreen';
import {createNativeStackNavigator} from '@react-navigation/native-stack';
import SearchResult from '../screens/SearchResult';
import Incidentes from '../screens/Incidentes';

const Stack = createNativeStackNavigator();
const HomeNavigator = (props) => {
  return (
    <Stack.Navigator screenOptions={{headerShown: false}}>
      <Stack.Screen name={'Home'} component={HomeScreen} />
      <Stack.Screen name={'SearchResult'} component={SearchResult} />
      <Stack.Screen name={'Incidentes'} component={Incidentes} />
    </Stack.Navigator>
  );
};
export default HomeNavigator;
