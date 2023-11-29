/* eslint-disable prettier/prettier */
/* eslint-disable no-alert */
import React, {useState, useEffect} from 'react';
import {
  View,
  Button,
  StyleSheet,
  FlatList,
  Text,
  TouchableOpacity,
  StatusBar,
  SafeAreaView,
} from 'react-native';
import {useNavigation} from '@react-navigation/native';
import {useRoute} from '@react-navigation/native';
const Item = ({item, onPress, backgroundColor, textColor}) => (
  <TouchableOpacity onPress={onPress} style={[styles.item, backgroundColor]}>
    <Text style={[styles.title, textColor]}>{item.incidente}</Text>
  </TouchableOpacity>
);

const Incidentes = props => {
  const navigation = useNavigation();
  const route = useRoute();
  const [Incidentes, setIncidentes] = useState([]);
  const [selectedId, setSelectedId] = useState(null);
  const {percurso, selectedHorario,selectedRota} = route.params;

  const renderItem = ({item}) => {
    const backgroundColor =
      item.incidente === selectedId ? 'darkblue' : 'lightblue';
    const color = item.incidente === selectedId ? 'white' : 'white';
    return (
      <Item
        item={item}
        onPress={() => setSelectedId(item.incidente)}
        backgroundColor={{backgroundColor}}
        textColor={{color}}
      />
    );
  };
  const getIncidentes = () => {
    var InsertAPIURL = 'http://10.0.2.2:80/jsbus/getTodosIncidentes.php';
    var headers = {
      Accept: 'application/json ',
      'Content-Type': 'application/json',
    };

    fetch(InsertAPIURL, {
      method: 'POST',
      headers: headers,
    })
      .then(response => response.json())
      .then(response => {
        try {
          setIncidentes(response);
        } catch (e) {
          console.log(e);
        }
      })
      .catch(error => {
        alert('ERROR ' + error);
      });
  };

  const EnviarNotificacao = () => {
    var InsertAPIURL = 'http://10.0.2.2:80/jsbus/enviarNotificacao.php';
    var headers = {
      'Accept': 'application/json ',
      'Content-Type': 'application/json',
    };
    var Data = {
      notificacao: selectedId,
      horario: selectedHorario,
      rota: selectedRota,
    };

    fetch(InsertAPIURL, {
      method: 'POST',
      headers: headers,
      body: JSON.stringify(Data),
    })
      .then(response => response.json())
      .then(response => {
        try 
        {
          alert(response[0].Message);
        } catch (e) {
          console.log(e);
        }
      })
      .catch(error => {
        alert('ERROR ' + error);
      });
  };

  useEffect(() => {
    getIncidentes();
  }, []);
  console.log(selectedId);
  return (
    <SafeAreaView style={styles.Container}>
      <FlatList
        data={Incidentes}
        renderItem={renderItem}
        keyExtractor={item => item.incidente}
        extraData={selectedId}
      />
      <View style={styles.fixToText}>
        <Button
          title="Enviar"
          color="black"
          onPress={() => EnviarNotificacao()}
        />
        <Button
          title="voltar"
          color="black"
          onPress={() =>
            navigation.navigate('SearchResult', {percurso, selectedHorario,selectedRota})
          }
        />
      </View>
    </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  fixToText: {
    flexDirection: 'row-reverse',
    justifyContent: 'space-evenly',
    alignContent: 'space-between',
    marginVertical: 20,
  },
  Container: {
    flex: 1,
    marginTop: StatusBar.currentHeight || 0,
  },
  item: {
    padding: 20,
    marginVertical: 8,
    marginHorizontal: 16,
  },
  title: {
    color: 'white',
    fontSize: 20,
  },
});
export default Incidentes;
