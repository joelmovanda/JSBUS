import React, {useState, useEffect} from 'react';
import {View, Text, Dimensions} from 'react-native';
import HomeMap from '../../components/HomeMap';
import CustomButton from '../../components/CustomButton';
import ComboBox from 'react-native-combobox';
import {useNavigation} from '@react-navigation/native';
const HomeScreen = props => {
  const [selectedHorario, setSelectedHorario] = useState('');
  const [selectedRota, setSelectedRota] = useState('');
  const navigation = useNavigation();
  const [horarios, setHorarios] = useState([]);
  const [rotas, setRotas] = useState([]);
  const [percurso, setPercurso] = useState([]);

  useEffect(() => {
    getTodosHorario();
    getTodasRotas();
  }, []);

  const getTodosHorario = () => {
    var InsertAPIURL = 'http://10.0.2.2:80/jsbus/getTodosHorario.php';
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
          setHorarios(response);
        } catch (e) {
          console.log(e);
        }
      })
      .catch(error => {
        alert('ERROR ' + error);
      });
  };

  const getTodasRotas = () => {
    var InsertAPIURL = 'http://10.0.2.2:80/jsbus/getTodasRota.php';
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
          setRotas(response);
        } catch (e) {
          console.log(e);
        }
      })
      .catch(error => {
        alert('ERROR ' + error);
      });
  };

  const getRotasParagens = () => {
    var InsertAPIURL = 'http://10.0.2.2:80/jsbus/getRota_Paragem_Motorista.php';
    var headers = {
      Accept: 'application/json ',
      'Content-Type': 'application/json',
    };

    var Data = {rota: rotas[selectedRota], horario: horarios[selectedHorario]};
    fetch(InsertAPIURL, {
      method: 'POST',
      headers: headers,
      body: JSON.stringify(Data),
    })
      .then(response => response.json())
      .then(response => {
        try {
          setPercurso(response);
        } catch (e) {
          console.log(e);
        }
      })
      .catch(error => {
        alert('ERROR ' + error);
      });
  };
  const gotoSearch = () => {
    getRotasParagens();
    if (percurso.length != 0) {
      navigation.navigate('SearchResult', {
        percurso,
        selectedHorario,
        selectedRota,
      });
    }
  };
  return (
    <View style={{flex: 1, justifyContent: 'space-between'}}>
      <View style={{height: Dimensions.get('window').height - 400}}>
        <HomeMap />
      </View>
      <View>
        <Text>SELECIONA A ROTA</Text>
        <ComboBox values={rotas} onValueSelect={setSelectedRota} />

        <Text>SELECIONA O HORÁRIO</Text>
        <ComboBox values={horarios} onValueSelect={setSelectedHorario} />
      </View>

      <View>
        <CustomButton
          text="Iniciar Viagem"
          onPress={() => {
            gotoSearch();
          }}
        />
      </View>
    </View>
  );
};

export default HomeScreen;
