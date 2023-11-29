import React, {useState} from 'react';
import {
  View,
  Text,
  Dimensions,
  Button,
  StyleSheet,
  Modal,
  Pressable,
  Alert,
} from 'react-native';
import RouteMap from '../../components/RouteMap';
import CountDown from 'react-native-countdown-component';
import {useNavigation} from '@react-navigation/native';
import {useRoute} from '@react-navigation/native';

const SearchResult = props => {
  const navigation = useNavigation();
  const route = useRoute();
  const {percurso, selectedHorario, selectedRota} = route.params;
  return (
    <View style={{flex: 1, justifyContent: 'space-between'}}>
      <View style={{height: Dimensions.get('window').height - 250}}>
        <RouteMap />
      </View>

      <View style={styles.fixToText}>
        <CountDown
          until={100}
          timeToShow={['H', 'M', 'S']}
          timeLabels={{h: 'Horas', m: 'Minutos', s: 'Segundos'}}
          onFinish={() => alert('Terminado!')}
          onPress={() => alert('Contagem Regressiva!')}
          size={20}
        />
      </View>
      <View style={styles.fixToText}>
        <Button
          title="STOP"
          color="black"
          onPress={() => navigation.navigate('Home')}
        />
        <Button
          title="Incidentes"
          color="black"
          onPress={() =>
            navigation.navigate('Incidentes', {
              percurso,
              selectedHorario,
              selectedRota,
            })
          }
        />
      </View>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    marginHorizontal: 16,
  },
  title: {
    textAlign: 'center',
    marginVertical: 8,
  },
  fixToText: {
    flexDirection: 'row-reverse',
    justifyContent: 'space-evenly',
    alignContent: 'space-between',
    marginVertical: 20,
  },
  separator: {
    marginVertical: 8,
    borderBottomColor: '#737373',
    borderBottomWidth: StyleSheet.hairlineWidth,
  },
});

export default SearchResult;
