import React from 'react';
import {View, Dimensions} from 'react-native';
import CustomButton from '../../components/CustomButton';

const HistoricoViagemScreen = props => {

  return (
    <View style={{flex: 1, justifyContent: 'space-between'}}>
      <View style={{height: Dimensions.get('window').height - 350}}>
        
      </View>
      <View style={{height: 450}}>
        <CustomButton text="Iniciar Viagem" />
      </View>
    </View>
  );
};

export default HistoricoViagemScreen;
