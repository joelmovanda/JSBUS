import React from 'react';
import MapView, {PROVIDER_GOOGLE, Marker} from 'react-native-maps';
import MapViewDirections from 'react-native-maps-directions';
import {useRoute} from '@react-navigation/native';

const RouteMap = props => {
  const route = useRoute();
  const {percurso} = route.params;
  const GOOGLE_MAPS_APIKEY = 'AIzaSyA6Gu3D7G1ZU4NemaIwp6w6MDpVnNSoAwo';
  //console.log(percurso);
  return (
    <MapView
      style={{height: '100%', width: '100%'}}
      provider={PROVIDER_GOOGLE}
      showsUserLocation={true}
      initialRegion={{
        latitude: 39.8239,
        longitude: -7.49189,
        latitudeDelta: 0.0222,
        longitudeDelta: 0.0121,
      }}>
      <MapViewDirections
        origin={percurso[0]}
        destination={percurso[percurso.length - 1]}
        apikey={GOOGLE_MAPS_APIKEY}
        travelMode={'DRIVING'} //-SOLICITA AS ROTAS POR MEIOS DE TRANSPORTE PÚBLICO
        strokeWidth={10}
        strokeColor={percurso[0].Cor}
        waypoints={percurso}
      />
      <Marker coordinate={percurso[0]} title={'Ponto de Partida'} />
      <Marker coordinate={percurso[percurso.length - 1]} title={'Destino'} />
      {percurso.map(percursos => (
        <Marker
          type={percursos}
          coordinate={percursos}
          title={percursos.paragem}
        />
      ))}
    </MapView>
  );
};
export default RouteMap;
