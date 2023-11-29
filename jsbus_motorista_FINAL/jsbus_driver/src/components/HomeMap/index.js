import React from 'react';
import MapView, {PROVIDER_GOOGLE} from 'react-native-maps';

const HomeMap = props => {
  return (
    <MapView
      style={{
        height: '100%',
        width: '100%',
      }}
      provider={PROVIDER_GOOGLE}
      showsUserLocation={true}
      initialRegion={{
        latitude: 39.8239,
        longitude: -7.49189,
        latitudeDelta: 0.0222,
        longitudeDelta: 0.0121,
      }}
    />
  );
};

export default HomeMap;
